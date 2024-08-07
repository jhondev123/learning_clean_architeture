<?php

namespace Jhonattan\CleanArchiteture\Domain\ValueObjects;

final class Cpf
{
    public function __construct(private string $cpf)
    {
        if (!$this->validateCpf($cpf)) {
            throw new \DomainException('Invalid CPF format');
        }
        $this->cpf = $cpf;
    }
    public function getValue(): string
    {
        return $this->cpf;
    }
    public function __toString()
    {
        return $this->cpf;
    }





    function validateCpf($cpf)
    {

        // Extrai somente os números
        $cpf = preg_replace('/[^0-9]/is', '', $cpf);

        // Verifica se foi informado todos os digitos corretamente
        if (strlen($cpf) != 11) {
            return false;
        }

        // Verifica se foi informada uma sequência de digitos repetidos. Ex: 111.111.111-11
        if (preg_match('/(\d)\1{10}/', $cpf)) {
            return false;
        }

        // Faz o calculo para validar o CPF
        for ($t = 9; $t < 11; $t++) {
            for ($d = 0, $c = 0; $c < $t; $c++) {
                $d += $cpf[$c] * (($t + 1) - $c);
            }
            $d = ((10 * $d) % 11) % 10;
            if ($cpf[$c] != $d) {
                return false;
            }
        }
        return true;
    }
}
