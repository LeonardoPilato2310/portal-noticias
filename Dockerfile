# Use uma imagem oficial do PHP com Apache (ajuste a versão conforme necessário)
FROM php:8.1-apache

# Copia todos os arquivos do projeto para o diretório padrão do Apache
COPY . /var/www/html/

# Ajusta as permissões (opcional, mas recomendado para evitar problemas de acesso)
RUN chown -R www-data:www-data /var/www/html

# Expõe a porta 80 para acesso HTTP
EXPOSE 80

# Instrução inicial para rodar o servidor Apache em primeiro plano
CMD ["apache2-foreground"]
