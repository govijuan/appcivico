<?php
function tl($s){

	$lang["en"]["Buscar"] = "Search";
	$lang["en"]["SUBMETA SUA APLICAÇÃO AGORA MESMO"] = "SUBMIT YOUR APPLICATION RIGHT NOW";
	$lang["en"]["Conheça"] = "See more";
	$lang["en"]["Em breve"] = "Soon";
	$lang["en"]["Desenvolvedor"] = "Developer";
	$lang["en"]["Site"] = "Website";
	$lang["en"]["País"] = "Country";
	$lang["en"]["Clique aqui para implementar esse Aplicativo"] = "Click here to implement this App";
	$lang["en"]["Implementação do App"] = "App implementation";
	$lang["en"]["Preencha o formulário abaixo para obter informações de como implementar esse App"] = "";
	$lang["en"]["Fechar"] = "Close";
	$lang["en"]["Descrição"] = "Description";
	$lang["en"]["Detalhes"] = "Details";
	$lang["en"]["Veja mais"] = "See more";
	$lang["en"]["Soluções cívicas certificadas pelo AppCivico"] = "Civic solutions certified by AppCívico";
	$lang["en"]["Nenhum aplicativo encontrado"] = "No app found";
	$lang["en"]["Quero implementar esse App"] = "I want to implement this App";
	$lang["en"]["voltar ao índice"] = "go back";



	$current_lang = pll_current_language();

	if ($current_lang != "pt"){
		if ($lang[$current_lang][$s] != ""){
		  return $lang[$current_lang][$s];
		}else{
		  return $s;
		}
	}else{
		return $s;
	}
}
?>