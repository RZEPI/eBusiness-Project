FROM prestashop/prestashop:1.7.8-apache

COPY ./public.crt /etc/ssl/certs/public.crt
COPY ./public.crt /usr/local/share/ca-certificates/public.crt
COPY ./private.key /etc/ssl/private/private.key
COPY ./default-ssl.conf /etc/apache2/sites-available/default-ssl.conf

RUN update-ca-certificates && a2enmod ssl && a2ensite default-ssl