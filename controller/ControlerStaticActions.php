<?php

class ControlerStaticActions {

    public static function EchoEmpty($msg): void {
        echo "o input " . $msg . " esta vazio";
    }

    public static function validImage($img): bool {
        if ($img['type'] == 'image/jpeg' || $img['type'] == 'image/jpg' || $img['type'] == 'image/png') {
            return true;
        } else {
            return false;
        }
    }

    public static function sizeImage($img): bool {
        if (intval($img['size'] / 1024) <= 300) {
            return true;
        } else {
            return false;
        }
    }

    public static function uploadImg($img, $folder): string {
        $unicoId = uniqid($img['name']);
        $diretorio = '/uploadImg/' . $folder . '/' . $unicoId . '.jpg';
        move_uploaded_file($img['tmp_name'], MEULAR . $diretorio);
        return ".." . $diretorio;
    }

    public static function validateCep($cep): bool {
        if ($cep != null) {
            if (strlen($cep) == 8) {
                if (preg_match('/(\d)\1{7}/', $cep)) {
                    return false;
                } else {

                    return true;
                }
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    public static function validateTel($tel): bool {
        $tel = self::clearNumbers($tel);
        if ($tel != null) {
            if (strlen($tel) == 11) {
                if (preg_match('/(\d)\1{10}/', $tel)) {
                    return false;
                } else {

                    return true;
                }
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    public static function validateEmail($email): bool {

        return preg_match('/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/', $email);
    }

    public static function validateCpf($cpf): bool {
        $cpf = self::clearNumbers($cpf);
        if ($cpf != null) {
            if (strlen($cpf) == 11) {
                if (preg_match('/(\d)\1{10}/', $cpf)) {
                    return false;
                } else {
                    $c = 0;
                    $t = 8;
                    while (true) {
                        for ($i = $c, $n = 0, $d = 0; $i <= $t; $i++) {
                            $d += ($cpf[$i] * (10 - $n++));
                        }
                        $res = 11 - ($d % 11);
                        if ($cpf[$t + 1] != $res) {
                            return false;
                        }
                        $t++;
                        if ($c == 1) {
                            return true;
                        }
                        $d = 0;
                        $c = 1;
                    }
                }
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    public static function validateCnpj($cnpj): bool {
        $cnpj = self::clearNumbers($cnpj);
        if ($cnpj != null) {
            if (strlen($cnpj) == 14) {
                if (preg_match('/(\d)\1{13}/', $cnpj)) {
                    return false;
                } else {
                    $n = 6;
                    $c = 11;
                    while (true) {
                        for ($i = 0, $d = 0; $i <= $c; $i++) {
                            $d += $cnpj[$i] * $n++;
                            if ($n == 10) {
                                $n = 2;
                            }
                        }
                        $d = $d % 11;
                        if ($cnpj[$i] != $d) {
                            return false;
                        }
                        if ($c == 12) {
                            return true;
                        }
                        $n = 5;
                        $c = 12;
                    }
                }
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    public static function clearNumbers($numero): string {
        return preg_replace("/[^0-9]/", "", $numero);
    }

}
