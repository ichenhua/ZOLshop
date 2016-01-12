<?php namespace Hdphp\Xml;

use DOMDocument;

class Xml
{

    private $dom;

    //生成xml字符串
    public function createXmlString($data)
    {
        $this->dom               = new DOMDocument('1.0', 'utf-8');
        $this->dom->formatOutput = true;

        $this->format($data, $this->dom);

        return $this->dom->saveXml();
    }

    //保存xml文件
    public function createXmlFile($data, $file)
    {
        $this->dom               = new DOMDocument('1.0', 'utf-8');
        $this->dom->formatOutput = true;

        $this->format($data, $this->dom);
        $this->dom->saveXml();

        return $this->dom->save($file);
    }

    //生成xml结构
    private function format($data, $element)
    {
        foreach ($data as $key => $value)
        {
            $elem = $this->dom->createElement($key);
            if (is_array($value))
            {
                $elem = $this->format($value, $elem);
            }
            else
            {
                if (is_numeric($value))
                {
                    $text = $this->dom->createTextNode($value);
                }
                else
                {
                    $text = $this->dom->createCDATASection($value);
                }
                $elem->appendChild($text);
            }
            $element->appendChild($elem);
        }

        return $element;
    }

    //将XML字符串转为数组
    public function xmlToArray($data)
    {
        $xmlRes = xml_parser_create('utf-8');
        xml_parser_set_option($xmlRes, XML_OPTION_SKIP_WHITE, 1);
        xml_parser_set_option($xmlRes, XML_OPTION_CASE_FOLDING, 0);
        xml_parse_into_struct($xmlRes, $data, $arr, $index);
        xml_parser_free($xmlRes);
        $k = 1;

        return self::getData($arr, $k);
    }

    //解析编译后的内容为数组
    private function getData($arrData, &$i)
    {
        $data = array();
        for ($i = $i; $i < count($arrData); $i++)
        {
            $name = $arrData[$i]['tag'];
            $type = $arrData[$i]['type'];
            switch ($type)
            {
                case "attributes":
                    $data[$name]['att'][] = $arrData[$i]['attributes'];
                    break;
                case "complete": //内容标签
                    $data[$name] = isset($arrData[$i]['value']) ? $arrData[$i]['value'] : '';
                    break;
                case "open": //块标签
                    $k               = isset($data[$name]) ? count($data[$name]) : 0;
                    $data[$name][$k] = self::getData($arrData, ++$i);
                    break;
                case "close":
                    return $data;
            }
        }

        return $data;
    }
}