Introduction
===============
This repository is a fixed variant of the stomp-php library at https://github.com/dejanb/stomp-php.  
I tested dejanb's stomp-php with RabbitMQ on Ubuntu, a few bugs occurred, so I fixed them. Mainly,  
1. I fixed the Stomp.ack(Frame) function by supplementing message-id to the headers of ACK frame.  
2. I use "\x00" as the terminator of frame, so as to determine the end of a frame when Stomp.readFrame().  
Maybe, dejanb's stomp-php works for ActiveMQ, but to be compatible with RabbitMQ too, I'd recommend this Rabbit-STOMP-PHP.  

Guide
===============
1. Download the repository manually or through Linux command "git clone https://github.com/eaminz/Rabbit-STOMP-PHP.git".  
2. At the begining of your PHP script, require the autoload.php and use the Stomp class. For example:  
    <?php
      require __DIR__."/../stomp-php/autoload.php";
      use FuseSource\Stomp\Stomp;
      ......
3. You can find example code under "/example" and "/stomp-php/fusesource/stomp-php/src/examples".  
4. It might happen that if you pre-installed php5-stomp extension, some class names will conflict. So do not.  
