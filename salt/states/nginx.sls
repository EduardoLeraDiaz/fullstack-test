nginx-install:
  pkg.installed:
    - pkgs:
      - nginx

nginx-conf:
  file.managed:
    - name: /etc/nginx/nginx.conf
    - source: /project/salt/conf/nginx.conf
    - replace: true
    - user: root
    - mode: 444
    - watch:
      - nginx-install

nginx:
  service.running:
    - reload: True
    - watch:
      - nginx-conf