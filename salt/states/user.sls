project:
  user.present:
    - home: /home/project
    - uid: {{ salt.cmd.run('stat -c "%u" /project') }}
    - gid: {{ salt.cmd.run('stat -c "%g" /project') }}


