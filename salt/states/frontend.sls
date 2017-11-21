nodejs:
  pkg.installed

# install npm manually for avoid problems with apt-get
# npm:
#   pkg.installed

npm:
  cmd.run:
    - name: 'cd && wget https://nodejs.org/dist/v4.4.5/node-v4.4.5-linux-x64.tar.xz && cd /usr/local && tar --strip-components 1 -xJf ~/node-v4.4.5-linux-x64.tar.xz'
    #- unless: test npm
    - cwd: /root/