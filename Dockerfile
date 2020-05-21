FROM nofear8991/larenv:ver2.0
CMD service apache2 start \\
    && service mysql start \\
    && bash;
