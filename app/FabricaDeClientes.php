<?php
require 'Cliente.php';

class FabricaDeClientes
{
	public function run($num = 10)
	{
		$clientes = [];
		
		for($i = 0; $i < $num; $i++)
		{
			$cliente = new Cliente(
				$this->fabricarNome(), 
				$this->fabricarEmail(), 
				$this->fabricarEndereco(), 
				$this->fabricarCpf(), 
				$this->fabricarTelefone()
			);
			
			$clientes[] = $cliente;
		}
		
		return $clientes;
	}
	
	private function fabricarNome()
	{
		return $this->gerarString(10, 10);
	}
	
	private function fabricarEmail()
	{
		$alfabetoEmbaralhado = $this->getAlfabetoNumeralEmbaralhado();
		$emailPart1 = $this->gerarString(3, 5);
		$emailPart2 = $this->gerarString(12, 6);
		$emailPart3 = $this->gerarString(17, 3);
		
		return $emailPart1 . '@' . $emailPart2 . '.' . $emailPart3;
	}
	
	private function fabricarEndereco()
	{
		$enderecoPart1 = $this->gerarString(15, 5);
		$enderecoPart2 = $this->gerarString(1, 7);
		
		return $enderecoPart1 . ' ' . $enderecoPart2; 
	}
	
	private function fabricarCpf()
	{
		return $this->gerarString(1, 3, true) . '.' . $this->gerarString(1, 3, true) . '.' . $this->gerarString(1, 3, true) . '-' . $this->gerarString(1, 2, true);
	}
	
	private function fabricarTelefone()
	{
		return '(' . $this->gerarString(1, 2, true) . ') ' . $this->gerarString(1, 4, true) . '-' . $this->gerarString(1, 4, true);
	}
	
	private function getAlfabetoNumeralEmbaralhado($numeral = false)
	{
		$conjunto = "AaBbCcDdEeFfgGhHiIjJlLmMnNoOpPrRsStTuUvVxXzZ";
		if($numeral)
		{
			$conjunto = '0123456789';
		}
		return str_shuffle($conjunto);
	}
	
	private function getDecimalEmbaralhado()
	{
		return $this->getAlfabetoNumeralEmbaralhado(true);
	}
	
	private function gerarString($inicio, $tamanho, $numeral = false)
	{
		$conjunto = $this->getAlfabetoNumeralEmbaralhado();
		if($numeral)
		{
			$conjunto = $this->getDecimalEmbaralhado();
		}
		return substr($conjunto, $inicio, $tamanho);
	}
}