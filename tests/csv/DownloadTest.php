<?php

use Niiyz\Csv\CsvDownload;

class CsvDownloadTest extends \PHPUnit_Framework_TestCase
{
    /**
     * リストに配列以外はエラー
     * @expectedException PHPUnit_Framework_Error
     */
    public function testSetInvalidListThrowsException()
    {
        $dl = new CsvDownload("テスト", []);
    }

    /**
     * ヘッダーに配列以外はエラー
     * @expectedException PHPUnit_Framework_Error
     */
    public function testSetInvalidHeaderThrowsException()
    {
        $dl = new CsvDownload([], "ヘッダー");
    }

    /**
     */
    public function testSampleTest()
    {
        $dl = new CsvDownload([
            [1, "あ", 1.11],
            [2, "い", 1.22],
            [3, "う", 1.33],
        ], []);
        
        $csv = $dl->getCsv();
      
        $this->assertSame("1,あ,1.11\r\n2,い,1.22\r\n3,う,1.33\r\n", $csv);
    }
    
    
}
