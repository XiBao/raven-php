<?php

/*
 * This file is part of Raven.
 *
 * (c) Sentry Team
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

class Raven_SerializerTestObject
{
    private $foo = 'bar';
}

class Raven_Tests_SerializerTest extends PHPUnit_Framework_TestCase
{
    public function testArraysAreArrays()
    {
        $serializer = new Raven_Serializer();
        $input = array(1, 2, 3);
<<<<<<< HEAD
        $result = Raven_Serializer::serialize($input);
=======
        $result = $serializer->serialize($input);
>>>>>>> 90cbb75d3c0aefa1ed5adf207a35627a2cdcd012
        $this->assertEquals(array('1', '2', '3'), $result);
    }

    public function testObjectsAreStrings()
    {
        $serializer = new Raven_Serializer();
        $input = new Raven_StacktraceTestObject();
<<<<<<< HEAD
        $result = Raven_Serializer::serialize($input);
=======
        $result = $serializer->serialize($input);
>>>>>>> 90cbb75d3c0aefa1ed5adf207a35627a2cdcd012
        $this->assertEquals('Object Raven_StacktraceTestObject', $result);
    }

    public function testIntsAreInts()
    {
        $serializer = new Raven_Serializer();
        $input = 1;
        $result = $serializer->serialize($input);
        $this->assertTrue(is_integer($result));
        $this->assertEquals(1, $result);
<<<<<<< HEAD
=======
    }

    public function testFloats()
    {
        $serializer = new Raven_Serializer();
        $input = 1.5;
        $result = $serializer->serialize($input);
        $this->assertTrue(is_float($result));
        $this->assertEquals(1.5, $result);
    }

    public function testBooleans()
    {
        $serializer = new Raven_Serializer();
        $input = true;
        $result = $serializer->serialize($input);
        $this->assertTrue(is_bool($result));
        $this->assertEquals(true, $result);

        $input = false;
        $result = $serializer->serialize($input);
        $this->assertTrue(is_bool($result));
        $this->assertEquals(false, $result);
    }

    public function testNull()
    {
        $serializer = new Raven_Serializer();
        $input = null;
        $result = $serializer->serialize($input);
        $this->assertTrue(is_null($result));
        $this->assertEquals(null, $result);
>>>>>>> 90cbb75d3c0aefa1ed5adf207a35627a2cdcd012
    }

    public function testRecursionMaxDepth()
    {
        $serializer = new Raven_Serializer();
        $input = array();
        $input[] = &$input;
<<<<<<< HEAD
        $result = Raven_Serializer::serialize($input, 3);
=======
        $result = $serializer->serialize($input, 3);
>>>>>>> 90cbb75d3c0aefa1ed5adf207a35627a2cdcd012
        $this->assertEquals(array(array(array('Array of length 1'))), $result);
    }
}
