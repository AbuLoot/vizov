<?php

namespace Codehappy\Captcha;

use Intervention\Image\ImageManager;

class Captcha
{
    /**
     * хранилище экземляра Intervention\Image\Image
     * @var \Intervention\Image\Image
     */
    protected $image;

    /**
     * хранилище для сгенерированной строки
     * @var string
     */
    protected $secret;

    /**
     * создание каптчи
     * $return mixed
     */
    public function make()
    {
        /**
         * перебираем массив из конфигурационного файла,
         * создаем свойства класса из ключей
         * и записываем туда значения
         */
        foreach(\Config::get('captcha') as $key => $value) {
            $this->$key = $value;
        }

        // создаем экземпляр Intervention\Image с шириной, высотой и цветом фона из конфига
        $imageManager = new ImageManager();
        $this->image = $imageManager->canvas($this->width, $this->height, $this->bgColor);

        // генерируем случайную строку и сохраняем в сессию
        $this->generateRandomString();

        // рисуем линии на заднем фоне для шума
        $this->drawLines();

        // пишем текст на изображении
        $this->writeText();

        // возвращаем ответ браузеру
        return $this->image->response('png', $this->quality);
    }

    /**
     * Проверка введенного значения на равенство с сохраненным
     * @param string $value
     * @return bool
     */
    public function check($value)
    {
        $secret = \Session::get('secret');
        return ($value == $secret);
    }

    /**
     * Генерация случайной строки и сохранение её в сессию
     */
    protected function generateRandomString()
    {
        $symbols = '012346789abcdefghjmnpqrtuxyzABCDEFGHJMNPQRTUXYZ';
        $string = '';
        for($i = 0; $i < $this->length; $i++) {
            $string .= substr($symbols, rand(1, strlen($symbols)) - 1, 1);
        }
        \Session::put('secret', $string);
        $this->secret = $string;
    }

    /**
     * рисование линий на заднем фоне
     */
    protected function drawLines()
    {
        for($i = 0; $i <= $this->countLines; $i++) {
            $this->image->line(
                rand(0, $this->image->width()),
                rand(0, $this->image->height()),
                rand(0, $this->image->width()),
                rand(0, $this->image->height()),
                function ($draw) {
                    $draw->color($this->randomColor());
                }
            );
        }
    }

    /**
     * Написание текста-каптчи на изображении
     */
    protected function writeText()
    {
        $chars = str_split($this->secret);
        for ($i = 0; $i < count($chars); $i++) {

            // оступ слева (кол-во символов до * ширину символа)
            $offsetLeft = ($i * $this->image->width() / $this->length);

            // отступ сверху ,случайное число от 2 до 10
            $offsetTop = rand(2, 10);

            $this->image->text($chars[$i], $offsetLeft, $offsetTop, function($font) {
                $font->file($this->fontFile);
                $font->size($this->fontSize());
                $font->color($this->randomColor());
                $font->valign('top');
                $font->angle($this->randomAngle());
            });
        }
    }

    /**
     * случайное значение размера шрифта
     * @return int
     */
    protected function fontSize()
    {
        return rand($this->image->height() - 10, $this->image->height());
    }

    /**
     * случайное значение цвета
     * @return array
     */
    protected function randomColor()
    {
        return [
            rand(0, 255),
            rand(0, 255),
            rand(0, 255)
        ];
    }

    /**
     * случайное значение угла
     * @return int
     */
    protected function randomAngle()
    {
        return rand(-15, 15);
    }

}