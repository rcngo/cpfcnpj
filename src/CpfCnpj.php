<?php

namespace rcngo\cpfcnpj;

/**
 * Class CpfCnpj
 * @package rcngo\CpfCnpj
 */
class CpfCnpj
{
    /**
     * @param $cpfOrCnpj
     * @return string
     */
    public function removeMaskCpfOrCnpj($cpfOrCnpj): string
    {
        return preg_replace("/\D+/", "", $cpfOrCnpj);
    }

    /**
     * @param $cpfOrCnpj
     * @return string
     */
    public function maskCpfOrCnpj($cpfOrCnpj): string
    {
        $cpfOrCnpj = $this->maskCpfOrCnpj($cpfOrCnpj);

        if(strlen($cpfOrCnpj) > 11) {
            return $this->maskCnpj($cpfOrCnpj);
        }

        return $this->maskCpf($cpfOrCnpj);
    }

    /**
     * @param $cpf
     * @return string
     */
    private function maskCpf($cpf): string
    {
        $cpf = str_pad($cpf, 11, '0', STR_PAD_LEFT);

        return $this->cpfValidate($cpf)
            ? substr($cpf, 0, 3).".".substr($cpf, 3, 3).".".substr($cpf, 6, 3)."-".substr($cpf, 9, 2)
            : $cpf;
    }

    /**
     * @param $cnpj
     * @return string
     */
    private function maskCnpj($cnpj)
    {
        $cnpj = str_pad($cnpj, 14, '0', STR_PAD_LEFT);

        return $this->cnpjValidate($cnpj)
            ? substr($cnpj, 0, 2).".".substr($cnpj, 2, 3).".".substr($cnpj, 5, 3)."/".substr($cnpj, 8, 4)."-".substr($cnpj, 12)
            : $cnpj;
    }

    /**
     * @param $cpf
     * @return bool
     */
    public function cpfValidate($cpf): bool
    {
        $cpf = $this->removeMaskCpfOrCnpj($cpf);

        if(empty($cpf) || strlen($cpf) > 11) return false;

        if(strlen($cpf) < 11) {
            $cpf = str_pad($cpf, 11, '0', STR_PAD_LEFT);
        }

        if ($cpf == '00000000000' ||
            $cpf == '11111111111' ||
            $cpf == '22222222222' ||
            $cpf == '33333333333' ||
            $cpf == '44444444444' ||
            $cpf == '55555555555' ||
            $cpf == '66666666666' ||
            $cpf == '77777777777' ||
            $cpf == '88888888888' ||
            $cpf == '99999999999') return false;

        for ($t = 9; $t < 11; $t++) {

            for ($d = 0, $c = 0; $c < $t; $c++) {
                $d += $cpf{$c} * (($t + 1) - $c);
            }

            $d = ((10 * $d) % 11) % 10;

            if ($cpf{$c} != $d) return false;
        }

        return true;
    }

    /**
     * @param $cnpj
     * @return bool
     */
    public function cnpjValidate($cnpj): bool
    {

        $cnpj = $this->removeMaskCpfOrCnpj($cnpj);

        if (strlen($cnpj) <> 14) return false;

        $sum = 0;
        $sum += ($cnpj[0] * 5);
        $sum += ($cnpj[1] * 4);
        $sum += ($cnpj[2] * 3);
        $sum += ($cnpj[3] * 2);
        $sum += ($cnpj[4] * 9);
        $sum += ($cnpj[5] * 8);
        $sum += ($cnpj[6] * 7);
        $sum += ($cnpj[7] * 6);
        $sum += ($cnpj[8] * 5);
        $sum += ($cnpj[9] * 4);
        $sum += ($cnpj[10] * 3);
        $sum += ($cnpj[11] * 2);

        $d1 = $sum % 11;
        $d1 = $d1 < 2 ? 0 : 11 - $d1;

        $sum = 0;
        $sum += ($cnpj[0] * 6);
        $sum += ($cnpj[1] * 5);
        $sum += ($cnpj[2] * 4);
        $sum += ($cnpj[3] * 3);
        $sum += ($cnpj[4] * 2);
        $sum += ($cnpj[5] * 9);
        $sum += ($cnpj[6] * 8);
        $sum += ($cnpj[7] * 7);
        $sum += ($cnpj[8] * 6);
        $sum += ($cnpj[9] * 5);
        $sum += ($cnpj[10] * 4);
        $sum += ($cnpj[11] * 3);
        $sum += ($cnpj[12] * 2);

        $d2 = $sum % 11;
        $d2 = $d2 < 2 ? 0 : 11 - $d2;

        return ($cnpj[12] == $d1 && $cnpj[13] == $d2);
    }
}
