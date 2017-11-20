php-repo-keys:
    cmd.run:
        - name: "apt-key adv --keyserver keyserver.ubuntu.com --recv-keys 4F4EA0AAE5267A6C"

php-repo:
  pkgrepo.managed:
    - ppa: ondrej/php

php-install:
  pkg.installed:
    - pkgs:
        - php7.0
        - php7.0-fpm
        - php7.0-curl
        - php7.0-cli
        - php7.0-mysql
        - php7.0-mbstring
        - php7.0-xml
        - php7.0-gd
        - php7.0-intl
        - php-xdebug


fpm/php.ini:
    file.managed:
        - source: /project/salt/conf/php.ini
        - name: /etc/php/7.0/fpm/php.ini
        - replace: true
        - user: root
        - mode: 444

cli/php.ini:
    file.managed:
        - source: /project/salt/conf/php.ini
        - name: /etc/php/7.0/cli/php.ini
        - replace: true
        - user: root
        - mode: 444


pfm/www.conf:
    file.managed:
        - source: /project/salt/conf/www.conf
        - name: /etc/php/7.0/fpm/pool.d/www.conf
        - replace: true
        - user: root
        - mode: 444

php7.0-fpm:
  pkg:
    - installed
  service:
    - running
    - reload: true
    - watch:
      - pfm/www.conf
      - cli/php.ini
      - pkg: php7.0-fpm

xdebug.ini:
  file.managed:
      - source: /project/salt/conf/xdebug.ini
      - name: /etc/php/7.0/fpm/conf.d/20-xdebug.ini
      - replace: true
      - user: root
      - mode: 444





