<?php
	session_name('Julia');
	session_start();

	error_reporting(0);

	$_SESSION['SESS_MEMBER_ID'] = session_id();
	
	$SeoTitle = "д-р Юлия Дончева PhD";
	$SeoKeywords = "педагогика, образование, родители, деца, социално - педагогически проекти, агресивно поведение, детска градина, начално училище, студенти, добри практики, висше образование, учители, педагогика на взаимодействието дете - среда, човекът и обществото";
	$SeoDescription = "Здравейте, радвам се, че посетихте моят  сайт! Надявам се да бъда полезна! Очаквам, бих се радвала  на градивни коментари, препоръки, мнения.";

	$ogTitle = "д-р Юлия Дончева PhD";
	$ogDescription = "Здравейте, аз съм Юлия Дончева, това е моят личен сайт. Тук ще намерите лична и професионална информация - автобиография, публикации, галерия от снимки, както и актуални новини относно професионалните ми ангажименти в Русенски университет &quot;Ангел Кънчев&quot;, и разбира се контактна информация.";
	$ogImage = "http://www.juliadoncheva.com/images/logo_fb.jpg";
	$ogUrl = "http://www.juliadoncheva.com/index.php";
?>