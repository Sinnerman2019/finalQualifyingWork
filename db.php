<?php
    //Объявление класса для подключения к б. д.
    class db {
        //Создание приватных статических переменных
        //Это соответствует свойству ООП «Инкапсуляция» — запрет на внешнее взаимодействие с элементами класса
        //Статические переменные позволяют обеспечить область видимости во всём классе и только, даже после изменения их значений 

        //Адрес хоста. Так как это локальный сервер, то localhost
        private static $host = "localhost";
        //Номер порта, значение 3306 является стандартным
        private static $port = 3306;
        //Наименования базы данных (требуется в формате familiya.mpt.ru, где familiya — фамилия студента)
        private static $name = "cutstudio";
        //Пользователь базы данных. По умолчанию в MySQL и PMA можно использовать root
        private static $db_usr = "root";
        //Пароль пользователя б. д. Он не задан по умолчанию, просто пустая строка, Не путать с null
        private static $db_psw = "";
        //Кодировка. В ОС семейства UNIX стандарт — UTF-8 (Linux, Android, iOS, macOS, их большинство)
        private static $charset = "utf8";

        //Создание публичных переменных, к которым пользователь сможет обращаться за пределами класса

        //Переменная для хранения подключения к б. д.
        public static $db = null;
        //Переменная для хранения результата выполнения запроса
        public static $rs = null;
        //Переменная для хранения запроса к базе данных
        public static $qr = "";

        //Описание метода, который производит подключение к б. д. по имеющимся параметрам.
        //Является приватным, так как каждый используется только для выполнения функций-запросов
        private static function getDb() {
            //Если подключение не определено (null), его нужно создать
            if(!self::$db) {
                //Инициалищация экземпляра класса PDO, одного из стандартных способов работы с б. д.
                self::$db = new PDO (
                    //Объявление конфигурации подключения из переменных выше. Типа (MySQL), сервер, порт и т. д.
                    "mysql:host=" . self::$host . ";
                    port=" . self::$port . ";
                    dbname=" . self::$name . ";
                    charset=" . self::$charset,
                    self::$db_usr,
                    self::$db_psw
                );
            }
            //Возвращение подключения для работы с конкретной базой данных (выполнения запроса именно в этой б. д., а не иной)
            return self::$db;
        }

        //Метод просто выполнения запроса, как установка переменных или конфигурация базы данных, создание таблицы
        //$qr — это запрос, а $pr — параметры (маркеры), которые используется в подготовленных выражениях из соображений безопасности
        public static function set($qr, $pr = array()) {
            //Класс подключения к б. д. обращается к области действия экземпляра этого класса (оператор объекта, ->) для подготовки запроса перед отправкой
            //После происходит запись результата в переменную результата $rs, чтобы в т. ч. можно было обращаться к другим объектам (функциям) класса
            self::$rs = self::getDb()->prepare($qr);
            //Сначала происходит выполнения запроса (execute) с указанием массива параметров ($pr), который средствами PHP принудительно конвертируется в массив, если не является таким
            //После результат выполнения запроса (ответ) возвращается пользователю (return)
            return self::$rs->execute((array)$pr);
        }

        //Данный метод позволяет получить таблицу в виде ассоциативного массива, где каждая строка является индексом(0, 1, ..., N), а каждый столбец и ячейка представляются в виде отношения ключ => значение
        public static function getAll($qr, $pr = array()) {
            self::$rs = self::getDb()->prepare($qr);
            self::$rs->execute((array)$pr);
            //fetchAll отвечает за преобразование полученной информации из запроса (напр. SELECT) 
            //PDO::FETCH_ASSOC отвечает за вывод этого в виде массива, индексированный именами столбцов результирующего набора. Дальнейшие параметры будут рассмотрены в будущем
            return self::$rs->fetchAll(PDO::FETCH_ASSOC);
        }

        public static function getLog($qr, $pr = array()) {
            self::$rs = self::getDb()->prepare($qr);
            self::$rs->execute((array)$pr);
            //fetchAll отвечает за преобразование полученной информации из запроса (напр. SELECT) 
            //PDO::FETCH_ASSOC отвечает за вывод этого в виде массива, индексированный именами столбцов результирующего набора. Дальнейшие параметры будут рассмотрены в будущем
            return self::$rs->fetch(PDO::FETCH_ASSOC);
        }

        //Метод, позволяющий добавлять данные в таблицы базы данных (INSERT). Его особенность будет рассмотрена ниже
        

        public static function add($qr, $pr = array()) {
            self::$rs = self::getDb()->prepare($qr);
            //В данном участке кода происходит обработка возможности выполнить запрос с помощью тернарного оператора
            //Если запрос может быть выполнен (первый блок), возвращается число-первичный ключ добавленного значения. Это реализовано при помощи метода класса PDO — lastInsertId()
            //Если запрос не был выполнен, или отсутствует столбец с ПК, возвращается 0 (второй блок)
            return (self::$rs->execute((array)$pr)) ? self::getDb()->lastInsertId() : 0;
        }        

        /* ДАЛЕЕ ТРЕБУЕТСЯ САМОСТОЯТЕЛЬНО РЕАЛИЗОВАТЬ СЛЕДУЮЩИЕ МЕТОДЫ РАБОТЫ С БАЗОЙ ДАННЫХ: */

        //Получение строки из таблицы
	    public static function getRow($qr, $pr = array()) {
	        /*  Данный метод с помощью fetch должен получать только запрощенную пользователем строку из б. д.
                Пример использование: получение одного пользователя по ID */
            self::$rs = self::getDb()->prepare($qr);
            self::$rs->execute((array)$pr);
            return self::$rs->fetch(PDO::FETCH_ASSOC);
        }

        //Получение значения из таблицы
	    public static function getId($qr, $pr = array(), $df = null) {
	        /*  Необходимо описать метод, который сначала получает строку по определённому условию,
                а затем выбирает первый элемент из неё. Пример запроса: SELECT user_login WHERE id_user = X

                В случае отсутствия значения возвращается null,
                либо заданное пользователем значение по умолчанию через переменную $df (default) */
            self::$rs = self::getDb()->prepare($qr);
            self::$rs->execute((array)$pr);
            return (self::$rs->execute((array)$pr)) ? self::$rs->fetch(PDO::FETCH_ASSOC) : $df;
	    }
    
        //Получение столбца из таблицы
	    public static function getColumn($qr, $pr = array()) {
	    	/*  Данный метод похож на получение всего содержимого таблицы,
                однако здесь необходимо использовать другой параметр метода fetchAll() */
            self::$rs = self::getDb()->prepare($qr);
            self::$rs->execute((array)$pr);
            return self::$rs->fetchAll(PDO::FETCH_COLUMN);
	    }
    

        //Подсчёт строк в таблице
	    public static function rowCount($qr, $pr = array()) {
	    	/*  Данный метод должен выозвращать число, равное количеству строк в таблице.
                Это можно сделать с помощью метода rowCount() */	
            self::$rs = self::getDb()->prepare($qr);
            self::$rs->execute((array)$pr);
           return self::$rs->fetchColumn();
	    }
    }