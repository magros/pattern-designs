<?php

interface eReaderInterface
{
    public function turnOn();

    public function pressNextButton();
}

class eReaderAdapter implements BookInterface
{
    private $reader;

    public function __construct(eReaderInterface $reader)
    {
        $this->reader = $reader;
    }

    public function open()
    {
        return $this->reader->turnOn();
    }

    public function turnPage()
    {
        return $this->reader->pressNextButton();
    }

}

class Nook implements eReaderInterface
{

    public function turnOn()
    {
        echo('turn the Nook on');
    }

    public function pressNextButton()
    {
        echo('press the next button on the Nook');
    }

}

class Kindle implements eReaderInterface
{

    public function turnOn()
    {
        echo('turn the Kindle on');
    }

    public function pressNextButton()
    {
        echo('press the next button on the Kindle');
    }

}

interface BookInterface
{

    public function open();

    public function turnPage();

}

class Book implements BookInterface
{

    public function open()
    {
        echo('opening the paper book.');
    }

    public function turnPage()
    {
        echo('turning the page of the paper book.');
    }

}


class Person
{
    public function read(BookInterface $book)
    {
        $book->open();
        $book->turnPage();
    }
}

(new Person)->read(new eReaderAdapter(new Kindle));
