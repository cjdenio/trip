FROM node:16 AS builder

WORKDIR /usr/src/app
COPY . .
RUN yarn install
RUN yarn build

FROM wordpress:5.7.2 AS wordpress

COPY --from=builder /usr/src/app /var/www/html/wp-content/themes/trip