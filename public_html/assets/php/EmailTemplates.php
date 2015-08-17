<?php

/* 
 * Here are the Email templates to use for password Request and new Accounts
 */


//Password request template
define('MSG_SUBJECT', 'Comentario del website');
define('MSG_BODY', ''
        . '<html><body>'
        . '<img src="http://www.adrianamejiacuartas.co/assets/img/logo.png" alt="Adriana Mejia Cuartas" />'
        . '<table rules="all" style="border-color: #666;" cellpadding="10">'
        . "<tr style='background: #eee;'><td><strong>De:</strong> </td><td>{{msg_name}} {{msg_last}}</td></tr>"
        . "<tr style='background: #eee;'><td><strong>Correo Electronico:</strong> </td><td>{{msg_from}}</td></tr>"
        . "<tr style='background: #eee;'><td><strong>Lista de Correo:</strong> </td><td>{{msg_subs}}</td></tr>"
		. "<tr style='background: #eee;'><td><strong>Mensaje:</strong> </td><td>{{msg_body}}</td></tr>"
        . '</table>'
        . '</body></html>');



