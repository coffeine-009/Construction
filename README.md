# Construction

## Configuration
Edit <code>.env.example</code> according to your params and rename to <code>.env</code>

## Build(composer)
<code>php composer.phar install</code><br />
<code>php artisan migrate</code>

## Permissions
Set access mode to: 
<table>
    <thead>
        <tr>
            <th>Path</th>
            <th>Mode</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td><code>public/files</code></td>
            <td>rw</td>
        </tr>
        <tr>
            <td><code>logs</code></td>
            <td>rw</td>
        </tr>
    </tbody>
</table>

<br />
