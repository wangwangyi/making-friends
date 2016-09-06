
<li>
    <a href="/xSystem" class="{{ $_index or '' }}"><span class="am-icon-home"></span> 首页</a>
</li>


<li>
    <a href="/xSystem/config/edit" class="{{ $_site_info or '' }}">
        <span class="am-icon-desktop"></span>
        站点信息
    </a>
</li>

<li>
    <a href="/xSystem/config/password/edit" class="{{ $_password or '' }}">
        <span class="am-icon-user"></span> 修改密码
    </a>
</li>

<li>
    <a href="/xSystem/config/cache" class="{{ $_cache or '' }}">
        <span class="am-icon-refresh am-icon-spin"></span> 清除缓存
    </a>
</li>

