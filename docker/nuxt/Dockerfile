FROM node:14-alpine3.14

WORKDIR /work

RUN apk update && \
    npm install -g npm 

#localhost:3000
EXPOSE 3000
ENV HOST=0.0.0.0 \
    TZ='Asia/Tokyo'