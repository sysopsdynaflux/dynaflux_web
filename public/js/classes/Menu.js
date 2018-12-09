function Menu(node)
{
	if(node === undefined)
        throw "Can\'t create a menu without a root node";
    else
    	console.log('Menu successfully initiated');

    this.active = null;
    this.root = this.recognize(null,node);
    this.expand(this.active.root);
}
Menu.prototype.recognize = function(parent,node)
{
	var menu = this;

	var item = new MenuItem();
	item.root = parent;
	item.node = node;	

	if($(node).find('> ul')[0] !== undefined)
	{	
		$(node).find('> ul > li').each(function(key,elem){
			item.children.push(menu.recognize(item,elem));
		});

		if($(item.node).find('> a')[0] !== undefined)
		{
			if($(item.node).find('> ul').hasClass('in'))
				$(item.node).find('> a').bind('click.collapse',function(){menu.collapse(item)});
			else
				$(item.node).find('> a').bind('click.prepare',function(){menu.prepare(item)});
		}		
	}
	else
	{
		item.children = [];

		if(menu.active == null && $(node).find('> a').hasClass('active'))
		{
			menu.active = item;
		}
	}

	return item;
}
Menu.prototype.prepare = function(item)
{
	var menu = this;
	$(item.node).find('> a').unbind('click.prepare');
	$(item.node).find('> a').bind('click.collapse',function(){menu.collapse(item)});
}
Menu.prototype.collapse = function(item)
{
	var menu = this;

	if(item.children.length > 0)
	{
		for(var child in item.children)
			menu.collapse(item.children[child]);

		if($(item.node).find('> ul').hasClass('in'))
		{
			$(item.node).find('> a').unbind('click.collapse');
			$(item.node).find('> a').click();
			$(item.node).find('> a').bind('click.prepare',function(){menu.prepare(item)});
		}
	}
}
Menu.prototype.expand = function(item)
{
	if(item.root !== null)
		this.expand(item.root);

	if($(item.node).find('> ul').length > 0)
	{
		$(item.node).find('> a').removeClass('collapsed');
		$(item.node).find('> ul').addClass('in');
	}
}

function MenuItem()
{
	this.root = null;
	this.children = [];
	this.node = null;
}