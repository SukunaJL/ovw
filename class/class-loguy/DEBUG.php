<?php
$_DEBUG_STATS = [];
class DEBUG {
	static function statStart($txt) {
		global $_DEBUG_STATS;
		$_DEBUG_STATS[$txt] = microtime(true);
	}
	static function statEnd($txt) {
		global $_DEBUG_STATS;
		$delay = microtime(true) - $_DEBUG_STATS[$txt];
		//echo $txt." = ".$delay."\n";
		return $delay;
	}
	static function displayAsTableLine()  {
		if (PHP_SAPI!="cli") {
			echo "<tr>";
		}
		for($i=0,$sum=0;$i<func_num_args();$i++) {
			$value = func_get_arg($i);
			
			if (gettype($value)=="array") {
				$length = $value[1];
				$value = str_pad($value[0], $length, " ", STR_PAD_RIGHT);
			}
			
			if (PHP_SAPI!="cli") {
				echo "<td>$value</td>";
			} else {
				echo $value."\t";
			}
		}

		if (PHP_SAPI!="cli") {
			echo "</tr>";
		} else {
			echo "\n";
		}
	}

	/**
	 * Affiche un debug en HTML ou en CLI d'un object
	 * @param stdClass $obj Object à débugger
	 * @param string $title Titre du debug
	 */
	static function printr($obj, $title=null) {
		if (PHP_SAPI!="cli") { echo "<pre style='background-color:#001B33; color:#f8f87d; padding:10px; font-size:14px; text-align:left'>"; }
		if ($title) {
			echo "####################################################\n";
			echo str_pad($title, 52, " ", STR_PAD_BOTH)."\n";
			echo "####################################################\n";
		}
		$obj = self::colorizeObject($obj,0);
		$texts = print_r($obj, true);
		
		$texts = explode("\n", $texts);
		$stdClassFound = false;
		$classTypeFound = false;
		$badNamedFound = true;
		$nbPass = 0;
		while ($badNamedFound) {
			$nbPass++;
			$stdClassFound = false;
			$classTypeFound = false;
			$badNamedFound = false;
			foreach ($texts as $lineNumber => $text) {
				$tmp = ltrim($text);
				$level = (strlen($text)-strlen($tmp)) / 4;
				if ($text=="") { continue; }
				if ($stdClassFound!==false && $classTypeFound!=false) {
					if ($level<=$stdClassFound->level) {
						$line = substr($classTypeFound->text, strpos($classTypeFound->text, "=> ")+3);
						$texts[$stdClassFound->lineNumber] = str_replace("stdClass", $line, $texts[$stdClassFound->lineNumber]);
						break;
					}
				}
				if (strpos($text, "stdClass Object")!==false) {
					$badNamedFound = true;
					if ($stdClassFound=== false) {
						$stdClassFound = (object)array("lineNumber"=>$lineNumber, "level"=>$level);
					}
				}
				if (strpos($text, "#######TYPE######")!==false) {
					$classTypeFound = (object)array("lineNumber"=>$lineNumber, "text"=>$text);
				}
			}
		}
		
		for ($i=count($texts)-1; $i>0; $i--) {
			if (strpos($texts[$i], "#######TYPE######")) {
				unset($texts[$i]);
			} else {
				$k = explode("=>", $texts[$i]);
				
				$keyName = trim($k[0]);
				
				$t = trim($keyName, "[]");
				$t = (PHP_SAPI!=="cli" ? "<debug style='color:#AAA'>" : "\e[0;93m").$t.":".(PHP_SAPI!=="cli" ? '</debug>' : "\e[0m");
				$texts[$i] = str_replace($keyName." =>", $t, $texts[$i]);
				//$texts[$i].= $t;
			}
		}
		echo implode("\n",$texts);
		if (PHP_SAPI!="cli") { echo "</pre>"; }
	}
	
	/**
	 * Affiche la liste des méthodes d'un object
	 * @param stdClass $obj Object à débugger
	 * @param string $title Titre du debug
	 */
	static public function printMethods($obj, $title=null) {	
		if (PHP_SAPI!="cli") { echo "<pre style='background-color:#001B33; color:#f8f87d; padding:10px; font-size:14px'>"; }
		if ($title) {
			echo "####################################################\n";
			echo str_pad($title, 52, " ", STR_PAD_BOTH)."\n";
			echo "####################################################\n";
		}
		$methods = get_class_methods(get_class($obj));
		sort($methods);
		$linesTxt = "";
		foreach ($methods as $methodName) {
			$r = new ReflectionMethod(get_class($obj), $methodName);
			$params = $r->getParameters();
			$linesTxt.= "function ".$methodName."(";
			$ps = [];
			foreach ($params as $param) {
				$txt = "$".$param->getName();
				if ($param->isOptional()) {
					$value = self::colorizeObject($param->getDefaultValue(),0);
					if (gettype($value)=="array") {
						$value = "[]";
					}
					$txt.="=".$value;
				}
				$ps[] = $txt; 
			}
			$linesTxt.= implode(",",$ps);
			$linesTxt.= ")\n";
		}
		echo $linesTxt;
		if (PHP_SAPI!="cli") { echo "</pre>"; }
	}
	
	/**
	 * Colorise un object en fonction de son type
	 * @param mixed $source L'object à colorier
	 * @return mixed L'object colorisé
	 */
	static function colorizeObject($source, $level) {
		$typeSource = gettype($source);
		if ($typeSource=="array") {
			$obj = array();
		} elseif ($typeSource=="object") {
			$obj = (object)array(); //"______TYPE_____"=>($source));
			$source->{"#######TYPE######"} = get_class($source);
		} else {
			$source = [$source];
		}
		foreach ($source as $key=>$value) {
			if (substr($key,0,1)!="_") {
				$type = gettype($value);
				switch ($type) {
					case "integer":
					case "double";
						$value = (PHP_SAPI!=="cli" ? "<debug data-level='$level' style='color:#84DDDD'>" : "\e[0;36m").$value.(PHP_SAPI!=="cli" ? '</debug>' : "\e[0m");
						break;
					case "boolean":
						$value = (PHP_SAPI!=="cli" ? "<debug data-level='$level' style='color:#de5c5f'>" : "\e[1;31m").($value ? "true" : "false").(PHP_SAPI!=="cli" ? '</debug>' : "\e[0m");
						break;
					case "string":
						
						if ($key==="#######TYPE######") {
							if (strpos($value, "stdClass")!==false) {
								$value = (PHP_SAPI!=="cli" ? "<debug data-level='$level' data-master='1' style='color:#AAA'>" : "\e[0;37m").$value.(PHP_SAPI!=="cli" ? '</debug>' : "\e[0m");
							} else {
								$value = (PHP_SAPI!=="cli" ? "<debug data-level='$level' data-master='1' style='color:#00F'>" : "\e[1;34m").$value.(PHP_SAPI!=="cli" ? '</debug>' : "\e[0m");
							}
						} else {
							$value = (PHP_SAPI!=="cli" ? "<debug data-level='$level' style='color:#32bf07'>\"" : "\e[0;32m\"").$value.(PHP_SAPI!=="cli" ? '"</debug>' : "\"\e[0m");
						}
						break;

					case "NULL":
						$value =  (PHP_SAPI!=="cli" ? "<debug data-level='$level' style='color:red'>" : "\e[0;31m")."NULL".(PHP_SAPI!=="cli" ? "</debug>" : "\e[0m");
						break;
					case "array":
						$value = self::colorizeObject($value, $level+1);
						break;
					case "object":
						$value = self::colorizeObject($value, $level+1);
						break;
					default:
						continue 2;
				}
				if ($typeSource=="array") {
					$obj[$key] = $value;
				} else if ($typeSource=="object") {
					$obj->{$key} = $value;
				} else {
					$obj = $value;
				}
			}
		}
		return $obj;
	}
}
/*var pre = document.getElementsByTagName('pre')[0];
var lines = pre.innerHTML.split("\n");

getLineLevel = function(i) {
        var line = lines[i];
        var sub = line.trim();
        var level = line.length - sub.length;
        return Math.floor(level/8);
}
for (var i=3; i<lines.length-750; i++) {
        //Si le niveau de la ligne suivante est plus grand, alors c'est que l'on est sur un object ou un array
        //if (getLineLevel(i+1) > getLineLevel(i)) {
        	console.log(i, getLineLevel(i), lines[i]);
	//}
}
console.log(lines);

*/
