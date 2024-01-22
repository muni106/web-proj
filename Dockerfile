FROM tomsik68/xampp:8
COPY schema.sql /schema.sql
COPY init-schema.sh /init-schema.sh
RUN chmod +x /init-schema.sh

RUN mkdir /images
RUN chmod -R a+rwX /images/

ENTRYPOINT  ["/init-schema.sh"]