<?php

use Base\Autenticacao as BaseAutenticacao;

/**
 * Skeleton subclass for representing a row from the 'autenticacao' table.
 *
 *
 *
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 */

class Autenticacao extends BaseAutenticacao
{
    public function getTrafegoTotal(){
        return number_format($this->getTrafegoupload() + $this->getTrafegodownload(),2);
    }

    public function getDuracaoDaConexao(){
            $ini = $this->getInicio();
            $inicio = [
                'ano'=>substr($ini,6,4),
                'mes'=>substr($ini,3,2),
                'dia'=>substr($ini,0,2),
                'hora'=>substr($ini, 11,2),
                'minuto'=>substr($ini, 14,2),
                'segundo'=>substr($ini, 17,2),
                'tz'=>'America/Sao_Paulo'
            ];
            $ini = \Carbon\Carbon::create(
                $inicio['ano'],
                $inicio['mes'],
                $inicio['dia'],
                $inicio['hora'],
                $inicio['minuto'],
                $inicio['segundo'],
                $inicio['tz']
            );
            $fim = '';
            if ($this->getTermino() == NULL){
                $fim = \Carbon\Carbon::now();
            } else{
                $fim = $this->getTermino();
                $termino = [
                    'ano'=>substr($fim,6,4),
                    'mes'=>substr($fim,3,2),
                    'dia'=>substr($fim,0,2),
                    'hora'=>substr($fim, 11,2),
                    'minuto'=>substr($fim, 14,2),
                    'segundo'=>substr($fim, 17,2),
                    'tz'=>'America/Sao_Paulo'
                ];
                $fim = \Carbon\Carbon::create(
                    $termino['ano'],
                    $termino['mes'],
                    $termino['dia'],
                    $termino['hora'],
                    $termino['minuto'],
                    $termino['segundo'],
                    $termino['tz']
                );
            }
            return $ini->diffInHours($fim);
    }
}
