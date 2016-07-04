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
	
}
