FROM nginx:alpine
RUN sed -ri -e 's!http://dl-cdn.alpinelinux.org!https://mirrors.aliyun.com!g' /etc/apk/repositories
RUN apk update && \
    apk --no-cache add ca-certificates tzdata &&\
    ln -sf /usr/share/zoneinfo/Asia/Shanghai /etc/localtime && \
    echo "Asia/Shanghai" > /etc/timezone
