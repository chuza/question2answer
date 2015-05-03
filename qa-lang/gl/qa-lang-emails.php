<?php
	
/*
	Question2Answer (c) Gideon Greenspan

	http://www.question2answer.org/

	
	File: qa-include/qa-lang-emails.php
	Version: See define()s at top of qa-include/qa-base.php
	Description: Language phrases for email notifications


	This program is free software; you can redistribute it and/or
	modify it under the terms of the GNU General Public License
	as published by the Free Software Foundation; either version 2
	of the License, or (at your option) any later version.
	
	This program is distributed in the hope that it will be useful,
	but WITHOUT ANY WARRANTY; without even the implied warranty of
	MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
	GNU General Public License for more details.

	More about this license: http://www.question2answer.org/license.php
*/

	return array(
		'a_commented_body' => "A súa resposta en ^site_title ten un novo comentario de ^c_handle:

^open^c_content^close

A súa resposta era:

^open^c_context^close

Pode responder e engadir o seu propio comentario:

^url

Grazas

^site_title",
		'a_commented_subject' => 'A súa resposta en ^site_title ten un novo comentario',

		'a_followed_body' => "A súa resposta en ^site_title ten unha nova pregunta relacionada por ^q_handle:

^open^q_title^close

A súa resposta era:

^open^a_content^close

Prema a seguir para responder a nova pregunta:

^url

Grazas,

^site_title",
		'a_followed_subject' => 'A súa resposta en ^site_title ten unha pregunta relacionada',

		'a_selected_body' => "Felicidades! Seleccionouse a súa resposta en ^site_title como a mellor por ^s_handle:

^open^a_content^close

A pregunta era:

^open^q_title^close

Prema a seguir para ver a súa resposta:

^url

Grazas,

^site_title",
		'a_selected_subject' => 'Seleccionouse a súa resposta en ^site_title!',

		'c_commented_body' => "Engadiuse un novo comentario de ^c_handle despois do seu comentario en ^site_title:

^open^c_content^close

A discusión é a seguinte:

^open^c_context^close

Pode responder engadindo outro comentario:

^url

Grazas,

^site_title",
		'c_commented_subject' => 'Engadiuse o seu comentario en ^site_title a',

		'confirm_body' => "Prema a seguir para confirmar o seu enderezo de correo para ^site_title.

^url

Grazas,
^site_title",
		'confirm_subject' => '^site_title - Confirmación de enderezo de correo',

		'feedback_body' => "Comentarios:
^message

Nome:
^name

Correo:
^email

Páxina previa:
^previous

Usuario:
^url

Enderezo IP:
^ip

Navegador:
ss:^browser",
		'feedback_subject' => '^ comentario',

		'flagged_body' => "Unha publicación de ^p_handle recibiu ^flags:

^open^p_context^close

Prema a seguir para ver a publicación:

^url


Prema a seguir para revisar todas as publicacións etiquetas:

^a_url


Gracias,

^site_title",
		'flagged_subject' => '^site_title ten unha publicación etiquetada',

		'moderate_body' => "Unha publicación de ^p_handle require a súa aprobación:

^open^p_context^close

Prema a seguir para aprobar ou rexeitar a publicación:

^url


Prema a seguir para revisar todas as publicacións na cola:

^a_url


Grazas,

^site_title",
		'moderate_subject' => 'Moderación de ^site_title',

		'new_password_body' => "A seguir o seu novo contrasinal en ^site_title.

Contrasinal: ^password

Recoméndase cambiar este contrasinal inmediatamente despois de iniciar a sesión.

Grazas,
^site_title
^url",
		'new_password_subject' => '^site_title - O seu novo contrasinal',

		'private_message_body' => "Acaba de enviárselle unha mensaxe privada por parte de ^f_handle de ^site_title:

^open^message^close

^moreThank you,

^site_title


Para bloquear mensaxes privadas, visite a súa páxina de conta:
^a_url",
		'private_message_info' => "Máis información sobre ^f_handle:

^url

",
		'private_message_reply' => "Prema a seguir para responder a ^f_handle mediante unha mensaxe privada:

^url

",
		'private_message_subject' => 'Mensaxe de ^f_handle en ^site_title',

		'q_answered_body' => "Ola, ^a_handle respondeu a súa pregunta en ^site_title :

^open^a_content^close

A súa pregunta era:

^open^q_title^close

Se lle gusta esta resposta, pode seleccionala como a mellor:

^url

Grazas,

^site_title",
		'q_answered_subject' => 'Respondeuse a súa pregunta en ^site_title',

		'q_commented_body' => "A súa pregunta en ^site_title ten un novo comentario de ^c_handle:

^open^c_content^close

A súa pregunta era:

^open^c_context^close

Pode responder engadindo o seu propio comentario:

^url

Grazas,

^site_title",
		'q_commented_subject' => 'A súa pregunta en ^site_title ten un novo comentario',

		'q_posted_body' => "Fíxose unha nova pregunta por parte de ^q_handle:

^open^q_title

^q_content^close

Prema a seguir para ver a pregunta:

^url

Grazas,

^site_title",
		'q_posted_subject' => '^site_title ten unha nova pregunta',
		
		'remoderate_body' => "Unha publicación editada por ^p_handle require a súa reaprobación:

^open^p_context^close

Prema a seguir para aprobar ou agochar a publicación editada:

^url


Prema a seguir para revisar todas publicacións en cola:

^a_url


Grazas,

^site_title",
		'remoderate_subject' => 'Moderación de ^site_title',

		'reset_body' => "Prema a seguir para restabelecer o seu contrasinal en ^site_title.

^url

Alternativamente, escriba o seguinte código no campo fornecido.

Código: ^code

Se vostede non pediu restabelecer o seu contrasinal, ignore esta mensaxe.

Grazas,
^site_title",
		'reset_subject' => '^site_title - Restabelecer o contrasinal esquecido',

		'to_handle_prefix' => "^,

",
		
		'u_registered_body' => "Rexistrouse un novo usuario como ^u_handle.

Prema a seguir para ver o perfil de usuario:

^url

Grazas,

^site_title",
		'u_to_approve_body' => "Rexistrouse un novo usuario como ^u_handle.

Prema a seguir para aprobar o usuario:

^url

Prema a seguir para revisar todos os usuarios agardando aprobación:

^a_url

Grazas,

^site_title",
		'u_registered_subject' => '^site_title ten un novo usuario rexistrado',
		
		'u_approved_body' => "Pode ver o seu novo perfil de usuario:

^url

Grazas,

^site_title",
		'u_approved_subject' => 'Aprobouse o seu usuario en ^site_title',
		
		'wall_post_subject' => 'Publicar no seu muro de ^site_title',
		'wall_post_body' => "^f_handle publicou no muro de vostede en ^site_title:

^open^post^close

Vostede pode responder á publicación aquí:

^url

Grazas,

^site_title",

		'welcome_body' => "Grazas por rexistrarse en ^site_title.

^custom^confirmOs detalles do seu acceso amosaranse a seguir:

Nome de usuario: ^handle
Correo: ^email

Garde esta información segura para futura referencias.

Grazas,

^site_title
^url",
		'welcome_confirm' => "Prema a seguir para confirmar o seu enderezo de correo electrónico.

^url

",
		'welcome_subject' => 'Benvido/a a ^site_title!',
	);
	

/*
	Omit PHP closing tag to help avoid accidental output
*/
