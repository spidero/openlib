<?php

require_once("config.php");

function ppre($input){
echo "<pre>";
print_r($input);
echo "</pre>";
}

function redir (){
	$domain = $_SERVER['HTTP_HOST'];
	$uri		=	$_SERVER['REQUEST_URI'];
	$kawalki = explode (".", $domain);
	$redir_domain = "www.".$domain.$uri;
	if ($kawalki[0]!="www") header ("Location: http://$redir_domain");
	
}

function admin_login_check($login){

	if(!isset($_SESSION['ident'])){
		# brak identa login sesji
		return 2;
	}

	//	if($login==1){
	//		return 3;
	//	}

	$browser_user_agent 	= $_SERVER["HTTP_USER_AGENT"];
	$browser_user_ip 		= $_SERVER["SERVER_ADDR"];
	$browser_remote_addr	= $_SERVER["REMOTE_ADDR"];
	$browser_server_host	= $_SERVER["HTTP_HOST"];

	$data_from_browser		= md5(sha1($login.$browser_user_agent.$browser_user_ip.$browser_server_host.$browser_remote_addr));
	$data_from_session		= $_SESSION['ident'];

	if ($data_from_browser!=$data_from_session){
		# sesja nie teges
		return 1;
	}
	else {
		# wszystko ok
		return 0;
	}
}

function str_code($string){
	$browser_user_agent 	= $_SERVER["HTTP_USER_AGENT"];
	$browser_user_ip 		= $_SERVER["SERVER_ADDR"];
	$browser_remote_addr	= $_SERVER["REMOTE_ADDR"];
	$browser_server_host	= $_SERVER["HTTP_HOST"];
	
	$wyjscie = md5(sha1($string.$browser_user_agent.$browser_user_ip.$browser_server_host.$browser_remote_addr));
	
	return $wyjscie;
}

function word_cut($text, $limit, $msg){
	if (strlen($text) > $limit){
		$txt1 = wordwrap($text, $limit, '[cut]');
		$txt2 = explode('[cut]', $txt1);
		$ourTxt = $txt2[0];
		$finalTxt = $ourTxt.$msg;
	}
	else{
		$finalTxt = $text;
	}
	return $finalTxt;
}

function clean($zmiena){
  $zmiena = addslashes(htmlspecialchars(strip_tags($zmiena)));
  return $zmiena;
}

function cms_domain() {
    
        $d = $_SERVER['HTTP_HOST'];
        if ($d[0]=='w' AND $d[1]=='w' AND $d[2]=='w') $d = substr($d, -strlen($d)+4);
        return $d;        
}

function do_logout_action($wyjscie){


}

function koduj($zmienna){

	$return  = sha1($zmienna."siemnkoooo");

	return ($return);
}

function get_domain(){

	$domain = $_SERVER['DOCUMENT_ROOT'];
	$uri		=	$_SERVER['REQUEST_URI'];
	
	$kawalki = explode ("/", $uri);
	$suma_kawalkow = count($kawalki);
	
	array_pop($kawalki);
	
	if (array_search('admin', $kawalki)){
		array_pop($kawalki);
	}
	
	$uri = implode("/", $kawalki);
	
	$package = $domain.$uri;
	return $package;
}

function get_real_domain(){

	$domain = $_SERVER['HTTP_HOST'];
	$uri		=	$_SERVER['REQUEST_URI'];
	
	$kawalki = explode ("/", $uri);
	$suma_kawalkow = count($kawalki);
	
	array_pop($kawalki);
	
	if (array_search('admin', $kawalki)){
		array_pop($kawalki);
	}
	
	$uri = implode("/", $kawalki);
	
	$package = $domain.$uri;
	return $package;
}

function resize_image($filename, $tmpname, $xmax, $ymax)  
{  
    $ext = explode(".", $filename);  
    $ext = $ext[count($ext)-1];  
 
    if($ext == "jpg" || $ext == "jpeg")  
        $im = imagecreatefromjpeg($tmpname);  
    elseif($ext == "png")  
        $im = imagecreatefrompng($tmpname);  
    elseif($ext == "gif")  
        $im = imagecreatefromgif($tmpname);  
 
    $x = imagesx($im);  
    $y = imagesy($im);  
 
    if($x <= $xmax && $y <= $ymax)  
        return $im;  
 
    if($x >= $y) {  
        $newx = $xmax;  
        $newy = $newx * $y / $x;  
    }  
    else {  
        $newy = $ymax;  
        $newx = $x / $y * $newy;  
    }  
 
    $im2 = imagecreatetruecolor($newx, $newy);  
    imagecopyresized($im2, $im, 0, 0, 0, 0, floor($newx), floor($newy), $x, $y);  
    return $im2;  
}

class thumbnail
{
    var $img;

    function thumbnail($imgfile)
    {
        //detect image format
        $this->img["format"]=ereg_replace(".*\.(.*)$","\\1",$imgfile);
        $this->img["format"]=strtoupper($this->img["format"]);
        if ($this->img["format"]=="JPG" || $this->img["format"]=="JPEG") {
            //JPEG
            $this->img["format"]="JPEG";
            $this->img["src"] = ImageCreateFromJPEG ($imgfile);
        } elseif ($this->img["format"]=="PNG") {
            //PNG
            $this->img["format"]="PNG";
            $this->img["src"] = ImageCreateFromPNG ($imgfile);
        } elseif ($this->img["format"]=="GIF") {
            //GIF
            $this->img["format"]="GIF";
            $this->img["src"] = ImageCreateFromGIF ($imgfile);
        } elseif ($this->img["format"]=="WBMP") {
            //WBMP
            $this->img["format"]="WBMP";
            $this->img["src"] = ImageCreateFromWBMP ($imgfile);
        } else {
            //DEFAULT
            echo "Not Supported File";
            exit();
        }
        @$this->img["lebar"] = imagesx($this->img["src"]);
        @$this->img["tinggi"] = imagesy($this->img["src"]);
        //default quality jpeg
        $this->img["quality"]=75;
    }

    function size_height($size=100)
    {
        //height
        $this->img["tinggi_thumb"]=$size;
        @$this->img["lebar_thumb"] = ($this->img["tinggi_thumb"]/$this->img["tinggi"])*$this->img["lebar"];
    }

    function size_width($size=100)
    {
        //width
        $this->img["lebar_thumb"]=$size;
        @$this->img["tinggi_thumb"] = ($this->img["lebar_thumb"]/$this->img["lebar"])*$this->img["tinggi"];
    }

    function size_auto($size=100)
    {
        //size
        if ($this->img["lebar"]>=$this->img["tinggi"]) {
            $this->img["lebar_thumb"]=$size;
            @$this->img["tinggi_thumb"] = ($this->img["lebar_thumb"]/$this->img["lebar"])*$this->img["tinggi"];
        } else {
            $this->img["tinggi_thumb"]=$size;
            @$this->img["lebar_thumb"] = ($this->img["tinggi_thumb"]/$this->img["tinggi"])*$this->img["lebar"];
         }
    }

    function jpeg_quality($quality=75)
    {
        //jpeg quality
        $this->img["quality"]=$quality;
    }

    function show()
    {
        //show thumb
        @Header("Content-Type: image/".$this->img["format"]);

        /* change ImageCreateTrueColor to ImageCreate if your GD not supported ImageCreateTrueColor function*/
        $this->img["des"] = ImageCreateTrueColor($this->img["lebar_thumb"],$this->img["tinggi_thumb"]);
            @imagecopyresized ($this->img["des"], $this->img["src"], 0, 0, 0, 0, $this->img["lebar_thumb"], $this->img["tinggi_thumb"], $this->img["lebar"], $this->img["tinggi"]);

        if ($this->img["format"]=="JPG" || $this->img["format"]=="JPEG") {
            //JPEG
            imageJPEG($this->img["des"],"",$this->img["quality"]);
        } elseif ($this->img["format"]=="PNG") {
            //PNG
            imagePNG($this->img["des"]);
        } elseif ($this->img["format"]=="GIF") {
            //GIF
            imageGIF($this->img["des"]);
        } elseif ($this->img["format"]=="WBMP") {
            //WBMP
            imageWBMP($this->img["des"]);
        }
    }

    function save($save="")
    {
        //save thumb
        if (empty($save)) $save=strtolower("./thumb.".$this->img["format"]);
        /* change ImageCreateTrueColor to ImageCreate if your GD not supported ImageCreateTrueColor function*/
        $this->img["des"] = ImageCreateTrueColor($this->img["lebar_thumb"],$this->img["tinggi_thumb"]);
            @imagecopyresized ($this->img["des"], $this->img["src"], 0, 0, 0, 0, $this->img["lebar_thumb"], $this->img["tinggi_thumb"], $this->img["lebar"], $this->img["tinggi"]);

        if ($this->img["format"]=="JPG" || $this->img["format"]=="JPEG") {
            //JPEG
            imageJPEG($this->img["des"],"$save",$this->img["quality"]);
        } elseif ($this->img["format"]=="PNG") {
            //PNG
            imagePNG($this->img["des"],"$save");
        } elseif ($this->img["format"]=="GIF") {
            //GIF
            imageGIF($this->img["des"],"$save");
        } elseif ($this->img["format"]=="WBMP") {
            //WBMP
            imageWBMP($this->img["des"],"$save");
        }
    }
} 

?>
