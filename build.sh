#!/bin/bash
#!/usr/bin
## php路径
phpPath=/usr/local/xzsoft/php/bin/php
## swagger 路径
swaggerPath=/home/users/jialonglong/swagger/swagger-php/bin/swagger
## 扫描项目路径
projectPath=/home/users/xuxin/project/landlordmall/api
## 生成json路径 注意最要有 '/'
jsonPath=/home/users/jialonglong/swagger/data/$USER/
##用户生成json存放路径 在jsonPath下
userPath=service
##默认index.html 默认访问页 hook test2
defaultIndex=/home/users/jialonglong/swagger/script/index.html
if [ ! -n "$projectPath" ];
then
    echo '您没有输入 要扫描的项目路径';
    exit;
fi
if [ ! -n "$userPath" ];
then
    jasonRealPath=${jsonPath}
else
    jasonRealPath=${jsonPath}${userPath}
    if [ ${jasonRealPath:0-1} != '/' ];
    then
        jasonRealPath=${jasonRealPath}/
    fi
fi
if [ ! -d $jasonRealPath ];
then
    mkdir -p $jasonRealPath;
    cp $defaultIndex $jasonRealPath;
fi
$phpPath $swaggerPath $projectPath -o  ${jasonRealPath}

