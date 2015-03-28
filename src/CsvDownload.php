<?php
namespace Niiyz\Csv;

class CsvDownload
{
    protected $csv = '';

    /**
     * コンストラクタ
     * @param array $list
     * @param array $header
     */
    public function __construct(Array $list, Array $header=[])
    {
        if (!is_array($list)) {
            throw new \InvalidArgumentException('$list only accepts array. Input was: ' . $list);
        }
        if (!is_array($header)) {
            throw new \InvalidArgumentException('$header only accepts array. Input was: ' . $header);
        }
        if (count($header) > 0) {
            array_unshift($list, $header);
        }
        $stream = fopen('php://temp', 'r+b');
        foreach ($list as $row) {
            fputcsv($stream, $row);
        }
        rewind($stream);
        $this->csv = str_replace(PHP_EOL, "\r\n", stream_get_contents($stream));
    }
    
    /**
     * 文字コードコンバート
     * @param string $from
     * @param string $to
     * @return void
     */    
    public function convertEncoding($from='UTF-8', $to='SJIS-win')
    {
        $this->csv = mb_convert_encoding($this->csv, $to, $from);
    }
    
    /**
     * CSV取得
     * @return void
     */
    public function getCsv()
    {
        return $this->csv;
    }

    /**
     * CSVダウンロード
     * @param string $filename
     * @return void
     */
    public function download($filename="")
    {
        header('Content-Type: text/csv');
        header("Content-Disposition: attachment; filename=$filename");
        echo $this->getCsv();
    }

}
