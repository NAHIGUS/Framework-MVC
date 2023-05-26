<?php
    //RETORNA A URL RAIZ DO PROJECTO
    function base_url(){
         return BASE_URL;
    }

     //MOSTRA A INFORMAÇÃO NUMARRAY FORMATADO
    function dep($data)
    {
        $format = print_r('<pre>');
        $format .= print_r($data);
        $format .= print_r('<pre>');
        return $format;
    }

    //ELIMINA EXCESSO DE ESPAÇOS ENTRE PALAVRAS
    function strclean($strWord)
    {
        $string = preg_replace(['/\s+/','/^\s|\s$/'],[' ',''],$strWord);
        $string = trim($string);
        $string = stripcslashes($string);
        $string = str_ireplace("<script>", "", $string);
        $string = str_ireplace("</script>", "", $string);
        $string = str_ireplace("<script src>", "", $string);
        $string = str_ireplace("<script type=>", "", $string);
        $string = str_ireplace("SELECT * FROM", "", $string);
        $string = str_ireplace("DELETE FROM", "", $string);
        $string = str_ireplace("INSERT INTO", "", $string);
        $string = str_ireplace("SELECT COUNT(*) FROM", "", $string);
        $string = str_ireplace("DROP TABLE", "", $string);
        $string = str_ireplace("OR '1'='1", "", $string);
        $string = str_ireplace('OR "1"="1"', "", $string);
        $string = str_ireplace('OR ´1´=´1´', "", $string);
        $string = str_ireplace("is NULL; --", "", $string);
        $string = str_ireplace("is NULL; --", "", $string);
        $string = str_ireplace("LIKE '", "", $string);
        $string = str_ireplace('LIKE "', "", $string);
        $string = str_ireplace("LIKE ´", "", $string);
        $string = str_ireplace("OR 'a'='a", "", $string);
        $string = str_ireplace('OR "a"="a', "", $string);
        $string = str_ireplace("OR ´a´=´a", "", $string);
        $string = str_ireplace("OR ´a´=´a", "", $string);
        $string = str_ireplace("--", "", $string);
        $string = str_ireplace("^", "", $string);
        $string = str_ireplace("[", "", $string);
        $string = str_ireplace("]", "", $string);
        $string = str_ireplace("==", "", $string);
        return $string;
    }

    //GERAR SENHAS AUTOMATICAS E ALEATORIAS DE 10 CARACTERES
    function passGenerator($length = 10){
        $pass = "";
        $lengthPass = $length;
        $word = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefgaijklmnopqrstuvwxyz1234567890";
        $lengthWord = strlen($word);

        for ($i=1; $i<=$lengthPass; $i++){
            $pos = rand(0, $lengthWord - 1);
            $pass .= substr($word, $pos, 1);
        }
        return $pass;
    }

    //GERAR UM TOKEN PARA RECUPERAR A SENHA
    function token(){
        $r1 = bin2hex(random_bytes(10));
        $r2 = bin2hex(random_bytes(10));
        $r3 = bin2hex(random_bytes(10));
        $r4 = bin2hex(random_bytes(10));
        $token = $r1.'-'.$r2.'-'.$r3.'-'.$r4;
        return $token;
    }

    //FORMATO PARA VALORES MONETARIOS
    function formatMoney($quantidade){
        $quantidade = number_format($quantidade, 2, SPD, SPM);
        return $quantidade;
    }

?>