function Menu(node)
{
	if(node === undefined)
        throw "Can\'t create a menu without a root node";
    else
    	console.log('Menu successfully initiated');

    this.tree = {};
    this.active = null;
    this.recognize(null,node);
    this.expand(this.active.root);
}
Menu.prototype.recognize = function(parent,node)
{
	var item = new MenuItem();
	item.root = parent;
	item.node = node;
	
	this.tree[$(node).find('> ul').attr('id')] = item;
	var menu = this;
	
	$(node).find('> ul li').each(function(key,elem){
		if($(elem).find('> ul')[0] !== undefined)
		{
			item.children.push($(elem).find('> ul').attr('id'));
			menu.recognize(item,elem);
			if($(elem).find('> ul').hasClass('in'))
				$(elem).find('> a').bind('click.collapse',function(){menu.collapse(elem)});
			else
				$(elem).find('> a').bind('click.prepare',function(){menu.prepare(elem)});
		}
		else
		{
			if(menu.active == null && $(elem).find('> a').hasClass('active'))
			{
				var active = new MenuItem();
				active.root = item;
				active.node = elem;

				menu.active = active;
			}
		}
	});
}
Menu.prototype.prepare = function(node)
{
	var menu = this;
	$(node).find('> a').unbind('click.prepare');
	$(node).find('> a').bind('click.collapse',function(){menu.collapse(node)});
}
Menu.prototype.collapse = function(node)
{
	var menuItem = this.tree[$(node).find('> ul').attr('id')];
	for(var child in menuItem.children)
	{
		var childItem = this.tree[menuItem.children[child]];
		this.collapse(childItem.node);
		
		var menu = this;
		if($(childItem.node).find('> ul').hasClass('in'))
		{
			$(childItem.node).find('> a').unbind('click.collapse');
			$(childItem.node).find('> a').click();
			$(childItem.node).find('> a').bind('click.prepare',function(){menu.prepare(childItem.node)});
		}
	}
}
Menu.prototype.expand = function(menuItem)
{
	if(menuItem.root !== null)
		this.expand(menuItem.root);

	if($(menuItem.node).find('> ul').length > 0)
	{
		$(menuItem.node).find('> a').removeClass('collapsed');
		$(menuItem.node).find('> ul').addClass('in');
	}
}

function MenuItem()
{
	this.root = null;
	this.children = [];
	this.node = null;
}