################################################################################
# Dockerfile for appserver.io webserver service
################################################################################

# base image
FROM debian:jessie

# author
MAINTAINER Tim Wagner <tw@appserver.io>

################################################################################

# define versions
ENV APPSERVER_RUNTIME_BUILD_VERSION 1.1.1-39
ENV APPSERVER_SOURCE_VERSION 1.1.1-alpha7

# define service to build
ENV APPSERVER_SERVICE webserver

# install packages
RUN apt-get update && \
    DEBIAN_FRONTEND=noninteractive apt-get install supervisor wget git -y

################################################################################

# download runtime in specific version
RUN wget -O /tmp/appserver-runtime.deb \
    http://builds.appserver.io/linux/debian/8/appserver-runtime_${APPSERVER_RUNTIME_BUILD_VERSION}~deb8_amd64.deb

# install runtime
RUN dpkg -i /tmp/appserver-runtime.deb; exit 0
RUN apt-get install -yf
RUN rm -f /tmp/appserver-runtime.deb
RUN ln -s /opt/appserver/bin/php /usr/local/bin/php

# define working directory
WORKDIR /opt/appserver

# expose ports
EXPOSE 9010

# supervisord needs this
CMD []

# define default command
ENTRYPOINT ["/usr/bin/supervisord"]