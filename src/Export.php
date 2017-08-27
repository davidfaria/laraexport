<?php

namespace LaraExport;

class Export
{
    public function excel($titulo, $fileName, $data)
    {
        // Nome do arquivo
        $fileName = $fileName . '.xls';

        // Abrindo tag tabela e criando titulo da tabela;
        $html = '';
        $html .= '<table border="1">';
        $html .= '<tr>';
        $html .= '<th colspan="'. count($data) .'">'. $titulo . '</th>';
        $html .= '</tr>';

        // criando a cabeçalho da tabela
        $html .= '<tr>';
        foreach ($data[0] as $key => $value) {
            $html .= '<th>'. ucfirst($key) .'</th>';
        }
        $html .= '</tr>';

        //criando o conteúdo da tabela

        for ($i =0; $i < count($data); $i++) {
            $html .= '<tr>';
            foreach ($data[$i] as $key => $value) {
                $html .= '<td>' . $value . '</td>';
            }
            $html .= '</tr>';
        }

        $html .= '</table>';

        //configurando header para download

        header("Content-Description: PHP Generated Data");
        header("Content-Type: application/x-msexcel");
        header("Content-Disposition: attachment; filename=\"{$fileName}\"");
        header("Expires: 0");
        header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
        header("Pragma: no-cache");

        // Envio conteúdo

        return $html;
    }

    public function xml($fileName, $data)
    {
        // echo '<pre>';
        // print_r($data);
        // echo '</pre>';
        // die();

        // Nome do arquivo
        $file = $fileName . '.xml';
        $xml = "";

        $xml .= '<?xml version="1.0" encoding="UTF-8"?>';
        $xml .= "<{$fileName}>";
        for($i =0; $i< count($data); $i++) {
            $xml .= '<row>';
            foreach($data[$i] as $key => $value) {
                $xml .= "<{$key}>$value</{$key}>";
            }
            $xml .= '</row>';
        }
        $xml .= "</{$fileName}>";

        //configurando header para download

        header("Content-Description: PHP Generated Data");
        header("Content-Type: application/xml");
        header("Content-Disposition: attachment; filename=\"{$file}\"");
        header("Expires: 0");
        header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
        header("Pragma: no-cache");

        // Envio conteúdo

        return $xml;

    }
}