<?php

namespace FL\QBJSParser\Tests\Parser\Doctrine;

use FL\QBJSParser\Parser\Doctrine\JoinPartialParser;

class JoinPartialParserTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @test
     */
    public function parseTest()
    {
        $queryBuilderFieldPrefixesToAssociationClasses = [
            'labels' => 'Valid_Class_Is_Not_Checked',
            'specification' => 'Valid_Class_Is_Not_Checked',
            'labels.specification' => 'Valid_Class_Is_Not_Checked',
        ];
        $parsed = JoinPartialParser::parse($queryBuilderFieldPrefixesToAssociationClasses);
        $expected = ' LEFT JOIN  object.labels   object_labels   LEFT JOIN  object.specification   object_specification   LEFT JOIN  object_labels.specification   object_labels_specification  ';

        $this->assertEquals($expected, $parsed);
    }
}
