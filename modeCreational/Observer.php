<?php
/**
 * Created by PhpStorm.
 * User: feng
 * Date: 2018/8/12
 * Time: 下午3:29
 */

//被观察者的对象
interface SplSubject
{
    public function attach(SplObserver $observer);

    public function detach(SplObserver $observer);

    public function notify();
}

//充当观察者的对象
interface SplObserver
{
    public function update(SplSubject $splSubject);
}

class User implements SplSubject
{
    public $observer = [];
    const REGISTER = 'register';
    const EDIT = 'edit';

    public function attach(SplObserver $observer, $type = null)
    {
        $this->observer[$type][] = $observer;
    }

    public function detach(SplObserver $observer, $type = null)
    {
        if ($index = array_search($observer, $this->observer[$type], true))
            unset($this->observer[$type][$index]);
    }

    public function notify($type = null)
    {
        if (!empty($this->observer[$type])) {
            foreach ($this->observer[$type] as $observer) {
                $observer->update($this);
            }
        }
    }

    public function addUser()
    {
        $res = true;
        $this->notify(self::REGISTER);
        return $res;
    }

    public function editUser()
    {
        $res = true;
        $this->notify(self::EDIT);
        return $res;
    }
}

class SendEmail implements SplObserver
{
    public function update(SplSubject $subject)
    {
        $this->send($subject->email, $subject->title, $subject->content);
    }

    private function send($email, $title, $content)
    {
        print_r([$email, $title, $content]);
    }

}