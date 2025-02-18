FROM debian:12

RUN apt update && apt install -y nginx curl host
RUN apt clean && rm -rf /var/lib/apt/lists/*

RUN service nginx restart

EXPOSE 80

RUN service nginx restart

CMD ["tail", "-f", "/dev/null"]
