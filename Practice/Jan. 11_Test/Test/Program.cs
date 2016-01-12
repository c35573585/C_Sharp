using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace Test
{
    class Program
    {
        static void Main(string[] args)
        {
            b bb = new b();
            
            Console.ReadLine();
        }
    }
    class a
    {
        public a()
        {
            printfields();
        }
        public virtual void printfields() { }
    }
    class b : a
    {
        int x = 1;
        int y;
        public b()
        {
            y = -1;//僅在此處有用
        }
        public override void printfields()
        {
            Console.WriteLine("x={0},y={1}", x, y);//b()的y值不影響，故y為0
        }

    }
}
