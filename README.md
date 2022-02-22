# Monolog Unit testing POC

A POC application to unit tests logs via [monolog package](https://github.com/Seldaek/monolog).

To test logs, [TestHandler.php](https://github.com/Seldaek/monolog/blob/main/src/Monolog/Handler/TestHandler.php) needs to be added to [logger instance](https://github.com/Seldaek/monolog/blob/main/doc/01-usage.md#configuring-a-logger) while unit testing env.
