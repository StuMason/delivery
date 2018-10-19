FROM nginx:alpine

COPY docker/nginx/default.conf.template /etc/nginx/conf.d/default.conf.template

COPY docker/nginx/entrypoint.sh /

ENTRYPOINT ["/entrypoint.sh"]

CMD ["nginx", "-g", "daemon off;"]