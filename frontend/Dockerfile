FROM node:20-alpine

WORKDIR /app

ENV VITE_PROXY_TARGET=http://backend:8000

EXPOSE 5173

CMD ["sh", "-c", "npm install --silent && npm run dev"]