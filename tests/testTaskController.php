<?php
require_once('TaskController.php');
use PHPUnit\Framework\TestCase;
class TaskTest extends TestCase {
    function testMark() {
        $task = new TaskController();
        $task->name = "hello";
        $this->assertEquals("hello", $task->actionMar());
    }
}
