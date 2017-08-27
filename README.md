**Package Laravel para Exportar dados nos
formatos - EXCEL MX(xls) e XML.**

**Instalação**

1 - Executar composer <br>
<pre>
<b>composer require davidfaria89/laraexport dev-master<b>
</pre>

2 - Adicionar a Class **LaraExportServiceProvider** em app/config.php <br>
<pre>
<b>\LaraExport\LaraExportServiceProvider::class,</b>
</pre>

3 - Exemplo de como usar

<b>"Crie uma rota para testar o método".<b><br>
<pre>
    Route::get('/exportexcel', 'ExportController@exportExcel');
</pre>

<pre>
    public function exportExcel() 
    {
        $export =  App::make('laraexport');
        $titulo = "Lista de Contatos";
        $fileName = "contatos";
    
        $data = [
            ["id" =>  1, "nome" => 'David', "telefone" => "(31) 9-8766 0980" ],
            ["id" =>  2, "nome" => 'Julio', "telefone" => "(19) 9-3445 98733" ],
            ["id" =>  3, "nome" => 'Welves', "telefone" => "(11) 9-7654 9105" ],
            ["id" =>  4, "nome" => 'Paulo', "telefone" => "(33) 9-9863 3245" ]
        ];
    
        return $export->excel($titulo, $fileName, $data);
    
        // para gerar xml chame o método abaixo.
        // return $export->xml($fileName, $data);
    }
</pre>
