ls -
setup_repository() {
    apt-get -y update
    apt-get -y install wget vim-nox git
    wget -O - https://repo.saltstack.com/apt/ubuntu/14.04/amd64/latest/SALTSTACK-GPG-KEY.pub | sudo apt-key add -

    cat > /etc/apt/sources.list.d/saltstack.list << 'END'

    deb http://repo.saltstack.com/apt/ubuntu/16.04/amd64/latest xenial main
END
}
###############################################################################
install_saltminion() {
    apt-get -q update
    apt-get -q -y install salt-minion
    yes | cp -f /project/salt/conf/minion /etc/salt/minion
}
###############################################################################

###############################################################################
run_highstate() {
    salt-call --local state.highstate
}
################################################################################


setup_repository;
install_saltminion;
run_highstate;
