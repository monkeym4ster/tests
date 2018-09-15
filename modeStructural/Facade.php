<?php
/**
 * 门面模式 （Facade）又称外观模式，用于为子系统中的一组接口提供一个一致的界面。
 * 门面模式定义了一个高层接口，这个接口使得子系统更加容易使用：
 * 引入门面角色之后，用户只需要直接与门面角色交互，用户与子系统之间的复杂关系由门面角色来实现，从而降低了系统的耦
 */

class Camera{
    public function turnOn(){}
    public function turnOff(){}
    public function rotate($degree){}
}

class Light{
    public function turnOn(){}
    public function turnOff(){}
    public function changeBulb(){}
}

class Sensor{
    public function activate(){}
    public function deactivate(){}
    public function trigger(){}
}

class Alarm{
    public function activate(){}
    public function deactivate(){}
    public function ring(){}
    public function stopRing(){}
}

class SecurityFacade{
    private $_camera1,$_camera2;
    private $_light1,$_light2,$_light3;
    private $_sensor;
    private $_alarm;

    public function __construct()
    {
        $this->_camera1 = new Camera();
        $this->_camera2 = new Camera();
        $this->_light1 = new Light();
        $this->_light2 = new Light();
        $this->_light3 = new Light();
        $this->_sensor = new Sensor();
        $this->_alarm = new Alarm();
    }

    public function activate(){
        $this->_camera1->turnOn();
        $this->_camera2->turnOn();
        $this->_light1->turnOn();
        $this->_light2->turnOn();
        $this->_light3->turnOn();
        $this->_sensor->activate();
        $this->_alarm->activate();
    }
}

$facade = new SecurityFacade();
$facade->activate();