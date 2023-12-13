#!/bin/bash
openssl req -x509 -nodes -days 365 -newkey rsa:2048 -keyout ./src/private.key -out ./src/public.crt -subj "/C=PL/ST=Pomeranian/L=Gdansk/O=Druzgotki/OU=DG/CN=localhost"