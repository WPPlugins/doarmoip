<?php
/*
Plugin Name: Doar Moip
Plugin URI: http://www.andrewebmaster.com.br/doar
Description: Doar Com Moip plugin
Version: 1.0
Author: Andre Luiz
Author URI: http://www.andrewebmaster.com.br
*/




$activateFunction = 'doarmoip_install'; // change this;
add_action( 'activate_' . preg_replace( '/.*wp-content.plugins./','',__FILE__ ), $activateFunction ); 
add_action('admin_menu', 'doarmoip_add_admin');
add_filter('the_content','doarmoip_content');


function doarmoip_add_admin()
{
	add_management_page('Doarmoip Management', 'Doarmoip', 8, 'doarmoipmanage', 'doarmoip_manage_page');
}


function doarmoip_content($content)
{
	global $wpdb;
	
    $regex = '[doarmoip]';
	$code = stripslashes(get_option('doarmoip_code'));
	$content = str_replace($regex, $code, $content);
    return $content;
}




function doarmoip_manage_page() {

    if(isset($_POST['doarmoip_code']))
    {
       update_option('doarmoip_code', $_POST['doarmoip_code']);
    }
	doarmoip_preferences();
}

function doarmoip_preferences()
{?>
	<div class="wrap"><h2>Inserir Codigo Moip Codigo</h2>
		<form action="<?php $_SERVER['PHP_BLANK'];?>" method="POST">
		<table class="edit-form">
		<tr>
			<td>Coloque aqui Codigo de Doar com MOIP: <a href="http://www.andrewebmaster.com.br/internet/wp-content/plugins/doarmoip/Leiame-doarmoip.pdf" title="Exemplo em PDF" target="_blank">Ver exemplo PDF..</a></td>
			<td><textarea name="doarmoip_code"><?php echo stripslashes(get_option('doarmoip_code'));?></textarea></td>
   		</tr>
		<tr>
			<td></td>
			<td><input type="submit" value="Savar Codigo"></td>
    		</tr>
		</table>
		</form>
        Coloque este ShortCode - <b>[doarmoip]</b> - em sua post ou Pagina para aparecer botao de doar MOIP
        <hr>
    	Se deseja Doar para contribuir em desenvolvimentos por favor<a href="http://www.andrewebmaster.com.br/internet/?p=1046" title="Doação Plugin" target="_blank"> <img src="http://www.andrewebmaster.com.br/internet/wp-content/plugins/doarmoip/botao-doar.jpg" border="0"></a>
          <hr>
         <td>Va para sua conta MOIP para gerar Codigo Doar: <a href="https://www.moip.com.br/AdmDonation.do?method=viewdonations" title="Gerar Codigo MOIP" target="_blank">Acessar Area MOIP..</a></td>
          <hr>
      URL site do Autor: <a href="http://www.andrewebmaster.com.br" title="URL do Autor" target="_blank"><img src="http://www.andrewebmaster.com.br/logo-login.gif" border="0"></a>
      <hr>
      Se quiser Baixe Plugin de Carinho de Comprar Moip<a href="http://wordpress.org/extend/plugins/wordpress-carrinho-moip/" title="Carrinho de Compras Moip wp" target="_blank"> <img src="http://www.andrewebmaster.com.br/internet/wp-content/plugins/wordpress-carrinho-moip/images/discussao-moip.jpg" border="0">Clicando Aqui...</a>
	</div>
<?}


/**
 * doarmoip_install
 * Only used to install the database table.
 * 
 * @return void
 */
function doarmoip_install() {

      add_option('doarmoip_code', '', 'Historico de code Doar', false);


}

?>
