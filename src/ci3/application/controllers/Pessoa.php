<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
* <p>
* Classe responsável por implementar a página de pessoas
* </p>
*
* <p>
* <strong>Histórico de Versões</strong>
* <ul>
* <li>#tar7110621_b - Criação da classe</li>
* </ul>
* </p>
*
* @author Igor V. Custódio <igorvc@icmc.usp.br>
*
* @copyright Seção Técnica de Informática - STI / ICMC
*/
class Pessoa extends CI_Controller {

	/**
	* <p>
	* Construtor
	* </p>
	*
	*
	* @param none
	* @return none
	*/
	public function index()
	{
		$data = array('nome' => 'Igor V. Custódio');
		$this->load->view('Pessoa_View',$data);
	}
	
	/**
	* <p>
	* Método que exibe um nome enviado, 
	* </p>
	*
	*
	* @param $nome Nome a ser exibido
	* @return none
	*/
	public function exibeNome($nome='')
	{
		$data = array('nome' => $nome);
		$this->load->view('Pessoa_View',$data);
	}
	
	/**
	* <p>
	* Método que exibe um nome enviado por post, caso contrário, exibe formulário 
	* </p>
	*
	*
	* @param none
	* @return none
	*/
	public function pedeExibeNome()
	{
		//carregando helper formulário
		$this->load->helper('form');
		//carregando biblioteca para validação de formulários
		$this->load->library('form_validation');
		
		//personalizando mensagem de erro de campo requerido
		$this->form_validation->set_message('required', 'Campo (<font color="red"><b>%s</b></font>) obrigatório!');
		
		//determinando o campo nome como obrigatório
		$this->form_validation->set_rules('campoNome', 'Nome', 'trim|required');
		
		$exibir_formulario = true;
		$nome = '';
		$form = '';
		$msg = '';
		
		if($this->input->post('submit')){// on SUBMIT!			
			if ($this->form_validation->run() == FALSE)
			{
				$exibir_formulario = true;
				$msg .= 'Erro ao tentar exibir o nome!<br>';
				$msg .= validation_errors();
				$ocorreu_erro = true;
			}
			else
			{
				$exibir_formulario = false;
				$nome = $this->input->post('campoNome');
				$data = array('nome' => $nome);
				$this->load->view('Pessoa_View',$data);
			}
		}
		
		
		$atributos = array('id' => 'exibir_nome');
		//passando como parametro do Form o id do método atual
		$form .= form_open_multipart('Pessoa/pedeExibeNome',$atributos);	//abrindo formulario!
		
		//Adicionando campo nome
		$data = array(
				  'name'        => 'campoNome',
				  'id'          => 'campoNome',
				  'value'       => set_value('campoNome'),
				  'maxlength'   => '100',
				  'size'        => '10',
				  'style'       => 'width:50%'
				);

		$form .= form_label('Nome:&nbsp;&nbsp;', 'campoNome');
		$form .= form_input($data);
		
		$form .= '<br><br>';
		
		//Botão enviar
		$data = array(
			'name' => 'submit',
			'id' => 'submit',
			'value' => 'Enviar',
			'type' => 'submit',
			'content' => 'enviar'
		);
	
		$form .= form_submit($data);
		
		$data = array('form' => $form, 'msg'=> $msg);
		$this->load->view('Pessoa_Form_View',$data);
		
	}
	
	
}
